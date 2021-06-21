import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'timeIn': {
        label: _('Time in'),
        format: 'time',
    },
    'timeout': {
        label: _('Time out'),
        format: 'time',
    },
    'monday': {
        label: _('Monday'),
    },
    'tuesday': {
        label: _('Tuesday'),
    },
    'wednesday': {
        label: _('Wednesday'),
    },
    'thursday': {
        label: _('Thursday'),
    },
    'friday': {
        label: _('Friday'),
    },
    'saturday': {
        label: _('Saturday'),
    },
    'sunday': {
        label: _('Sunday'),
    }
};

const schedule:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Schedule',
    title: _('Schedule', {count: 2}),
    path: '/schedules',
    properties
};

export default schedule;