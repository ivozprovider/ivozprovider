import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form'

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'defaultPolicy': {
        label: _('Default policy'),
        enum: {
            'allow': _('allow'),
            'deny': _('deny'),
        }
    },
    //@TODO CallAclRelMatchLists subscreen list
};

const callAcl:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'CallAcl',
    title: _('Call ACL', {count: 2}),
    path: '/call_acls',
    properties,
    Form
};

export default callAcl;