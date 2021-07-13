import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'description': {
        label: _('Description'),
    },
    'open': {
        label: _('Status'),
        enum: {
            '0': _("Closed"),
            '1': _("Opened"),
        }
    },

    //@TODO open
    //@TODO status
    //@TODO openExtension
    //@TODO closeExtension
    //@TODO toggleExtension
};

const routeLock:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'RouteLock',
    title: _('Route Lock', {count: 2}),
    path: '/route_locks',
    properties,
    Form
};

export default routeLock;