import { FormControlLabel, TextField, Switch, FormHelperText, LinearProgress, FormControl, makeStyles, Theme } from '@material-ui/core';
import { ScalarProperty, FkProperty, PropertySpec } from 'services/Api/ParsedApiSpecInterface';
import EntityService from 'services/Entity/EntityService';
import { useFormikType } from './types';
import Dropdown from 'services/Form/Field/Dropdown';
import React from 'react';

export default class FormFieldFactory
{
    private styles:any;

    constructor(
        private entityService: EntityService,
        private formik: useFormikType
    ) {
        this.styles = makeStyles((theme: Theme) => ({
            switch: {
                marginTop: '10px',
            },
            inputText: {
                marginTop: '0px',
            },
            linearProgress: {
                paddingTop: '60px',
            }
          }));
    }

    public getFormField(fld:string, choices?:any)
    {
        const property = this.getProperty(fld);
        if (!property) {
            console.error(`Property ${fld} was not found`);
            return null;
        }

        return (
            <React.Fragment>
                {this.getInputField(fld, choices)}
                {property.helpText && <FormHelperText variant={'outlined'}>
                    {property.helpText}
                </FormHelperText>}
            </React.Fragment>
        );
    }

    private getProperty(fld: string): PropertySpec
    {
        const properties = this.entityService.getColumns();

        return properties[fld];
    }

    private getInputField(fld:string, choices?:any)
    {
        const property = this.getProperty(fld);
        const disabled = (property as ScalarProperty).readOnly;
        const classes:any = this.styles();

        if ((property as FkProperty).$ref) {

            if (!choices) {
                return (<div className={classes.linearProgress}><LinearProgress /></div>);
            }

            return (
                <Dropdown
                    name={fld}
                    label={property.label}
                    value={this.formik.values[fld]}
                    required={property.required}
                    disabled={disabled}
                    onChange={this.formik.handleChange}
                    choices={choices}
                />
            );

        }

        if ((property as ScalarProperty).type === 'boolean') {

            const checked = !!(this.formik.values[fld]);

            return (
                <FormControl className={classes.switch} fullWidth={true} variant="outlined">
                    <FormControlLabel
                        control={<Switch
                            name={fld}
                            checked={checked}
                            required={property.required}
                            disabled={disabled}
                            onChange={this.formik.handleChange}
                        />}
                        label={property.label}
                    />
                </FormControl>
            );
        }

        if ((property as ScalarProperty).type === 'integer') {

            return (
                <TextField
                    name={fld}
                    type="number"
                    value={this.formik.values[fld]}
                    disabled={disabled}
                    label={property.label}
                    InputLabelProps={{ shrink: true, required: property.required }}
                    onChange={this.formik.handleChange}
                    error={this.formik.touched[fld] && Boolean(this.formik.errors[fld])}
                    helperText={this.formik.touched[fld] && this.formik.errors[fld]}
                    fullWidth={true}
                    className={classes.inputText}
                    margin="normal"
                    variant="outlined"
                />
            );
        }

        if ((property as ScalarProperty).type === 'string') {

            if ((property as ScalarProperty).enum) {

                const enumValues:any = (property as ScalarProperty).enum;

                if (Array.isArray(enumValues)) {
                    choices = choices || {};
                    for (const enumValue of enumValues) {
                        choices[enumValue] = enumValue;
                    }
                } else {
                    choices = enumValues;
                }

                return (
                    <Dropdown
                        name={fld}
                        label={property.label}
                        value={this.formik.values[fld]}
                        required={property.required}
                        disabled={disabled}
                        onChange={this.formik.handleChange}
                        choices={choices}
                    />
                );
            }

            if ((property as ScalarProperty).format === 'date-time') {
                return (
                    <TextField
                        name={fld}
                        type="datetime-local"
                        value={this.formik.values[fld]}
                        inputProps={{
                            step: 1,
                        }}
                        disabled={disabled}
                        label={property.label}
                        InputLabelProps={{ shrink: true, required: property.required }}
                        onChange={this.formik.handleChange}
                        error={this.formik.touched[fld] && Boolean(this.formik.errors[fld])}
                        helperText={this.formik.touched[fld] && this.formik.errors[fld]}
                        fullWidth={true}
                        className={classes.inputText}
                        margin="normal"
                        variant="outlined"
                    />
                );
            }

            if ((property as ScalarProperty).format === 'time') {
                return (
                    <TextField
                        name={fld}
                        type="time"
                        value={this.formik.values[fld]}
                        disabled={disabled}
                        label={property.label}
                        InputLabelProps={{ shrink: true, required: property.required }}
                        onChange={this.formik.handleChange}
                        error={this.formik.touched[fld] && Boolean(this.formik.errors[fld])}
                        helperText={this.formik.touched[fld] && this.formik.errors[fld]}
                        fullWidth={true}
                        className={classes.inputText}
                        margin="normal"
                        variant="outlined"
                    />
                );
            }

            return (
                <TextField
                    name={fld}
                    type="text"
                    value={this.formik.values[fld]}
                    disabled={disabled}
                    label={property.label}
                    InputLabelProps={{ shrink: true, required: property.required }}
                    onChange={this.formik.handleChange}
                    error={this.formik.touched[fld] && Boolean(this.formik.errors[fld])}
                    helperText={this.formik.touched[fld] && this.formik.errors[fld]}
                    fullWidth={true}
                    className={classes.inputText}
                    margin="normal"
                    variant="outlined"
                />
            );
        }

        return (<span>TODO FIELD TYPE {(property as ScalarProperty).type}</span>)
    }
}