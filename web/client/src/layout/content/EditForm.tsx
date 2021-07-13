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

interface EditProps extends EntityInterface {
  entityService: EntityService,
  history:any,
  match:any,
  row: any
}

const EditForm = (props: EditProps) => {

  const { marshaller, unmarshaller, history, match, row } = props;
  const { Form: EntityForm, entityService }: { Form: any, entityService: EntityService } = props;

  const classes = useStyles();
  const entityId = match.params.id;

  const [error, setError] = useState(null);

  const apiPut = useStoreActions((actions:any) => {
    return actions.api.put
  });

  const submit = async (values: any, actions: FormikHelpers<any>) => {

    const { setSubmitting } = actions;
    const putPath = entityService.getPutPath();
    if (!putPath) {
      throw new Error('Unknown item path');
    }

    try {
      await apiPut({
        path: putPath.replace('{id}', entityId),
        values: marshaller(values)
      });

      setError(null);
      history.goBack();
    } catch (error) {
      console.error(error);
      setError(error.toString());
    } finally {
      setSubmitting(false);
    }
  };

  const formik:useFormikType = useFormik({
    initialValues: unmarshaller(row),
    validate: props.validator,
    onSubmit: submit,
  });

  return (
    <div>
      <form onSubmit={formik.handleSubmit}>
        <EntityForm formik={formik} edit={true} classes={classes} {...props} />
        <br />
        <Button color="primary" variant="contained" type="submit">
          {_('Save')}
        </Button>
        {error && <ErrorMessage message={error} />}
      </form>
    </div>
  )
};

const useStyles = makeStyles((theme: any) => ({
  dropDown: {
    minWidth: '250px'
  }
}));

export default withRouter<any, any>(EditForm);
