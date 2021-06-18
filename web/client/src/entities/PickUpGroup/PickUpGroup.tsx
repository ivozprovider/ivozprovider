import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form'

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    //@TODO relUsers multiselect
};

const terminal:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'PickUpGroup',
    title: _('Pick up group', {count: 2}),
    path: '/pick_up_groups',
    properties,
    Form
};

export default terminal;