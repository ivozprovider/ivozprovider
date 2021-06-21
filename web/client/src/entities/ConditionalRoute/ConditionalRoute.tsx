import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'locution': {
        label:_('Locution'),
    },
    'routeType': {
        label: _('Route type'),
        enum: {
            'user': _('User'),
            'ivr': _('IVR'),
            'huntGroup': _('Hunt Group'),
            'voicemail': _('Voicemail'),
            'number': _('Number'),
            'friend': _('Friend'),
            'queue': _('Queue'),
            'conferenceRoom': _('Conference room'),
            'extension': _('Extension'),
        },
    },
    'ivr': {
        label: _('IVR'),
    },
    'huntGroup': {
        label: _('Hunt Group'),
    },
    'voiceMailUser': {
        label: _('Voicemail'),
    },
    'user': {
        label: _('User'),
    },
    'numberCountry': {
        label: _('Country'),
    },
    'numberValue': {
        label: _('Number'),
    },
    'friendValue': {
        label: _('Friend value'),
    },
    'queue': {
        label: _('Queue'),
    },
    'conferenceRoom': {
        label: _('Conference room'),
    },
    'extension': {
        label: _('Extension'),
    },
    'target': {
        label: _('Target'),
    },
};

const conditionalRoute:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'ConditionalRoute',
    title: _('Conditional Route', {count: 2}),
    path: '/conditional_routes',
    properties,
    Form
};

export default conditionalRoute;