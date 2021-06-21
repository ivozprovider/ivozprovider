import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    //@TODO recordingExtension
    //@TODO originalFile
    //@TODO encodedFile
    'status': {
        label: _('Status'),
        enum: {
            'pending': _('pending'),
            'encoding': _('encoding'),
            'ready': _('ready'),
            'error': _('error'),
        }
    }
};

const locution:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Locution',
    title: _('Locution', {count: 2}),
    path: '/locutions',
    properties
};

export default locution;