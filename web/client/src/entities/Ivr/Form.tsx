import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import CountrySelectOptions from 'entities/Country/SelectOptions';
import LocutionSelectOptions from 'entities/Locution/SelectOptions';
import ExtensionSelectOptions from 'entities/Extension/SelectOptions';
import UserSelectOptions from 'entities/User/SelectOptions';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices, setFkChoices] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {

            if (loadingFks) {

                LocutionSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            welcomeLocution: options,
                            noInputLocution: options,
                            errorLocution: options,
                            successLocution: options,
                        }
                    });
                });

                //@TODO
                // excludedExtensions

                CountrySelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            noInputNumberCountry: options,
                            errorNumberCountry: options,
                        }
                    });
                });

                ExtensionSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            noInputExtension: options,
                            errorExtension: options,
                        }
                    });
                });

                UserSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            noInputVoiceMailUser: options,
                            errorVoiceMailUser: options,
                        }
                    });
                });

                setLoadingFks(false);
            }

            return function umount() {
                setMounted(false);
            };
        },
        [loadingFks, fkChoices]
    );

    const groups:Array<FieldsetGroups> = [
        {
            legend: _('Basic Configuration'),
            fields: [
                'name',
                'timeout',
                'maxDigits',
                'welcomeLocution',
                'successLocution',
            ]
        },
        {
            legend: _('Extension dialing'),
            fields: [
                'allowExtensions',
                'excludedExtensionIds',
            ]
        },
        {
            legend: _('No input configuration'),
            fields: [
                'noInputLocution',
                'noInputRouteType',
                'noInputNumberCountry',
                'noInputNumberValue',
                'noInputExtension',
                'noInputVoiceMailUser',
            ]
        },
        {
            legend: _('Error configuration'),
            fields: [
                'errorLocution',
                'errorRouteType',
                'errorNumberCountry',
                'errorNumberValue',
                'errorExtension',
                'errorVoiceMailUser',
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;