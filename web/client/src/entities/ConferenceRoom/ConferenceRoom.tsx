import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'pinProtected': {
        label: _('Pin protected'),
        enum: {
            '0': _("No"),
            '1': _("yes"),
        }
    },
    'pinCode': {
        label: _('Pin code'),
    },
    'maxMembers': {
        label: _('Max member'),
    },
};

const conferenceRoom:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'ConferenceRoom',
    title: _('Conference room', {count: 2}),
    path: '/conference_rooms',
    properties,
    Form
};

export default conferenceRoom;