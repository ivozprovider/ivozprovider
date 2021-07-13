import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'callDirection': {
        label: _('Direction'),
        enum: {
            '__null__': _('Both'), //@TODO __null__ marshaller
            'outbound': _('Outbound'),
            'inbound': _('Inbound'),
        }
    },
    'frequency': {
        label: _('Frequency'),
    },
    'unit': {
        label: _('Unit'),
        enum: {
            'day': _('Day'),
            'week': _('Week'),
            'month': _('Month'),
        }
    },
    'email': {
        label: _('Email'),
        helpText: _('Leave empty if no mail is needed (just generate CSV).'),
    },
    'lastExecution': {
        label: _('Last execution'),
        //@TODO IvozProvider_Klear_Ghost_SchedulerSuccess
    },
    'nextExecution': {
        label: _('Next execution'),
    },
    'brand': {
        label: _('Brand'),
    },
    'callCsvNotificationTemplate': {
        label: _('Notification template'),
    },
    'ddi': {
        label: _('DDI'),
    },
    'retailAccount': {
        label: _('Retail Account'),
    },
    'residentialDevice': {
        label: _('Residential Device'),
    },
    'user': {
        label: _('User'),
    },
    'fax': {
        label: _('Fax'),
    },
    'friend': {
        label: _('Friend'),
    },
};

const callCsvScheduler:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'CallCsvScheduler',
    title: _('Call csv scheduler', {count: 2}),
    path: '/call_csv_schedulers',
    properties,
    Form
};

export default callCsvScheduler;