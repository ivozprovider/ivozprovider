import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';

const properties:PropertiesList = {
    'iden': {
        label:_('Iden'),
    },
    'name': {
        label:_('Name'),
    },
    'description': {
        label:_('Description'),
    },
    'defaultCode': {
        label:_('Code'),
        //@TODO prefix: '<span class="asterisc">*</span>'
        //@TODO pattern: '[#0-9*]+'
        helpText: _('Future brands will have services enabled with this codes by default')
    },
    'extraArgs': {
        label:_('Service has extra arguments'),
        enum: {
            '0': _('No'),
            '1': _('Yes'),
        }
    },
};

const terminal:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Service',
    title: _('Service', {count: 2}),
    path: '/services',
    properties
};

export default terminal;