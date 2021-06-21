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
    'companyType': {
        label: _('Client Type'),
        //@TODO data-autofilter-select-by-data
        enum: {
            '__null__': _('All'),
            vpbx: _('vPBX'),
            retail: _('Retail'),
            residential: _('Residential'),
            wholesale: _('Wholesale'),
        }
    },
    'callCsvNotificationTemplate': {
        label: _('Notification template'),
    },
    'ddi': {
        label: _('DDI'),
    },
    'carrier': {
        label: _('Carrier'),
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
    'ddiProvider': {
        label: _('DDI Provider'),
    },
    'vpbx': {
        label: _('Client'),
        //@TODO visualFilter
    },
    'retail': {
        label: _('Client'),
        //@TODO visualFilter
    },
    'residential': {
        label: _('Client'),
        //@TODO visualFilter
    },
    'endpointType': {
        label: _('Endpoint type'),
        enum: {
            '_NULL_': _('All'),
            user: _('User'),
            fax: _('Fax'),
            friend: _('Friend'),
        }
    },
    'residentialEndpointType': {
        label: _('Endpoint type'),
        enum: {
            '_NULL_': _('All'),
            residentialDevice: _('Residential Device'),
            fax: _('Fax'),
        }
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