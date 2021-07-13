import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
};

const matchList:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'MatchList',
    title: _('Match List', {count: 2}),
    path: '/match_lists',
    properties
};

export default matchList;