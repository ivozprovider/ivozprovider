import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form'

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'defaultAction': {
        label: _('Default Action'),
        enum: {
            'keep': _("Keep Original DDI"),
            'force': _("Force DDI"),
        },
    },
    'forcedDdi': {
        label: _('Forced DDI'),
    }
};

const outgoingDdiRule:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'OutgoingDdiRule',
    title: _('Outgoing DDI Rule', {count: 2}),
    path: '/outgoing_ddi_rules',
    properties,
    Form
};

export default outgoingDdiRule;