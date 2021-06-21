import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form'

const properties:PropertiesList = {
    'activationTime': {
        label: _('Activation time'),
    },
    'ratingPlanGroup': {
        label: _('Rating plan'),
    },
    'routingTag': {
        label: _('Routing Tag'),
    },
};

const terminal:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'RatingProfile',
    title: _('Rating profile', {count: 2}),
    path: '/rating_profiles',
    properties,
    Form
};

export default terminal;