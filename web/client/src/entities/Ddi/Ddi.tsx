import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'ddi': {
        label: _('DDI'),
    },
    'externalCallFilter': {
        label:_('External call filter'),
    },
    'routeType': {
        label: _('Route type'),
        enum: {
            '__null__': _("Unassigned"),
            'user': _('User'),
            'ivr': _('IVR'),
            'huntGroup': _('Hunt Group'),
            'fax': _('Fax'),
            'conferenceRoom': _('Conference room'),
            'friend': _('Friend'),
            'queue': _('Queue'),
            'residential': _('Residential Device'),
            'conditional': _('Conditional Route'),
            'retail': _('Retail Account'),
        }
    },
    'recordCalls': {
        label: _('Record call'),
        helpText: _('Local legislation may enforce to announce the call recording to both parties, act responsibly'),
    },
    'displayName': {
        label: _('Display name'),
        helpText: _("This value will be displayed in the called terminals"),
    },
    'user': {
        label: _('User'),
    },
    'ivr': {
        label: _('IVR'),
    },
    'huntGroup': {
        label: _('Hunt Group'),
    },
    'fax': {
        label: _('Fax'),
    },
    'conferenceRoom': {
        label: _('Conference room'),
    },
    'residentialDevice': {
        label: _('Residential Device'),
    },
    'friendValue': {
        label: _('Friend value'),
    },
    'ddiProvider': {
        label: _('DDI Provider'),
        helpText: _("This assignment has no functional purpose, it is just for DDI Provider <-> DDI navigation in some brand level sections.")
    },
    'country': {
        label: _('Country'),
    },
    'language': {
        label: _('Language'),
    },
    'queue': {
        label: _('Queue'),
    },
    'conditionalRoute': {
        label: _('Conditional Route'),
    },
    'retailAccount': {
        label: _('Retail Account'),
    },
    'target': {
        label: _('Target'),
    },
};

const ddi:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Ddi',
    title: _('DDI', {count: 2}),
    path: '/ddis',
    properties,
    Form
};

export default ddi;