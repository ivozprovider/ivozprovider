import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'email': {
        label: _('Email'),
    },
    'sendByEmail': {
        label: _('Send by email'),
        enum: {
            '0': _('No'),
            '1': _('Yes'),
        }
    },
    'outgoingDdi': {
        label: _('Outgoing DDI'),
        //@TODO 'null': _("Client's default")
    },
};

const extension:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Fax',
    title: _('Fax', {count: 2}),
    path: '/faxes',
    properties,
    Form
};

export default extension;