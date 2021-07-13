import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'description': {
        label: _('Description'),
    },
    'strategy': {
        label: _('Strategy'),
        enum: {
            'ringAll': _('Ring all'),
            'linear': _('Linear'),
            'roundRobin': _('Round Robin'),
            'random': _('Random')
        },
        helpText: _('Determines the order users will be called')
    },
    'preventMissedCalls': {
        label: _('Prevent missed calls'),
        enum: {
            '0': _('No'),
            '1': _('Yes'),
        },
        helpText: _("When 'Yes', calls will never generate a missed call. When 'No', missed calls will be prevented only for RingAll huntgroups if someone answers."),
    },
    'allowCallForwards': {
        label: _('Allow Call Forwards'),
        enum: {
            '0': _('No'),
            '1': _('Yes'),
        },
        helpText: _("When 'Yes', Users call forward settings will be followed."),
    },
    'ringAllTimeout': {
        label: _('Ring all timeout'),
    },
    'noAnswerTargetType': {
        label: _('Timeout target type'),
        enum: {
            '__null__': _('Unassigned'),
            'number': _('Number'),
            'extension': _('Extension'),
            'voicemail': _('Voicemail'),
        }
    },
    'noAnswerLocution': {
        label: _('No answer locution'),
    },
    'noAnswerNumberCountry': {
        label: _('Country'),
    },
    'noAnswerNumberValue': {
        label: _('Number'),
    },
    'noAnswerExtension': {
        label: _('Extension'),
    },
    'noAnswerVoiceMailUser': {
        label: _('Voicemail'),
    },
};

const huntGroup:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'HuntGroup',
    title: _('Hunt Group', {count: 2}),
    path: '/hunt_groups',
    properties,
    Form
};

export default huntGroup;