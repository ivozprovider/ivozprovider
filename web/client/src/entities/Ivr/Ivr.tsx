import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'welcomeLocution': {
        label:_('Welcome locution'),
    },
    'noInputLocution': {
        label: _('No input locution'),
    },
    'errorLocution': {
        label: _('Locution'),
    },
    'successLocution': {
        label: _('Success locution'),
    },
    'timeout': {
        label: _('Timeout'),
        helpText: _('Time in seconds the IVR will wait after playing the welcome locution or dialing a digit'),
    },
    'maxDigits': {
        label: _('Max digits'),
        helpText: _('Max number of digits the caller can enter. Set to 0 to disable.'),
    },
    'allowExtensions': {
        label: _('Allow dialing extensions'),
    },
    'excludedExtensions': {
        label: _('Excluded Extension'),
        //@TODO multiselect
    },
    'noInputRouteType': {
        label: _('No input target type'),
        enum: {
            'number': _('Number'),
            'extension': _('Extension'),
            'voicemail': _('Voicemail'),
        }
    },
    'noInputNumberCountry': {
        label: _('Country'),
    },
    'noInputNumberValue': {
        label: _('Number'),
    },
    'noInputExtension': {
        label: _('Extension'),
    },
    'noInputVoiceMailUser': {
        label: _('Voicemail'),
    },
    'errorRouteType': {
        label: _('Error target type'),
        enum: {
            'number': _('Number'),
            'extension': _('Extension'),
            'voicemail': _('Voicemail'),
        },
    },
    'errorNumberCountry': {
        label: _('Country'),
    },
    'errorNumberValue': {
        label: _('Number'),
    },
    'errorExtension': {
        label: _('Extension'),
    },
    'errorVoiceMailUser': {
        label: _('Voicemail'),
    },
    'noInputTarget': {
        label: _('TarNo input targetget'),
    },
    'errorTarget': {
        label: _('Error target'),
    }
};

const ivr:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Ivr',
    title: _('IVR', {count: 2}),
    path: '/ivrs',
    properties,
    Form
};

export default ivr;