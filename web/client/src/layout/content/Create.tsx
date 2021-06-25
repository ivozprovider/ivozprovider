import { useState } from 'react';
import { withRouter } from "react-router-dom";
import { FormikHelpers, useFormik } from 'formik';
import {
  Button,
  makeStyles
} from '@material-ui/core';
import ErrorMessage from './shared/ErrorMessage';
import EntityService from 'services/Entity/EntityService';
import EntityInterface from 'entities/EntityInterface';
import { useFormikType } from 'services/Form/types';
import { useStoreActions } from 'easy-peasy';
import _ from 'services/Translations/translate';

interface CreateProps extends EntityInterface {
  entityService: EntityService,
  history:any,
  match:any
}

const Create = (props:CreateProps) => {

  const { marshaller, path, history, properties } = props;
  const { Form: EntityForm, entityService }: { Form: any, entityService:EntityService } = props;
  const [error, setError] = useState(null);
  const apiPost = useStoreActions((actions:any) => {
      return actions.api.post
  });
  const classes = useStyles();

  const submit =  async (values:any , actions: FormikHelpers<any>) => {

      const {setSubmitting} = actions;

      try {

        await apiPost({
          path,
          values: marshaller(values),
          contentType: 'application/json',
        });
        setError(null);
        history.push(path);

      } catch (error) {
        console.error(error);
        setError(error.toString());
      } finally {
        setSubmitting(false);
      }
  };

  const initialValues:any = {
    ...entityService.getDefultValues(),
    ...props.initialValues
  }

  for (const idx in properties) {
    if (initialValues[idx] !== undefined) {
      continue;
    }

    initialValues[idx] = '';
  }

  const formik:useFormikType = useFormik({
    initialValues: initialValues,
    validate: props.validator,
    onSubmit: submit,
  });

  return (
    <div>
      <form onSubmit={formik.handleSubmit}>
        <EntityForm formik={formik} create={true} classes={classes} {...props} />
        <br />
        <Button color="primary" variant="contained" type="submit">
          {_('Save')}
        </Button>
        { error && <ErrorMessage message={error} /> }
      </form>
    </div>
  )
};

const useStyles = makeStyles((theme:any) => ({
  dropDown: {
    minWidth: '250px'
  }
}));

export default withRouter<any, any>(Create);
