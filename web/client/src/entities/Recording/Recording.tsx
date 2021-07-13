import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';

const properties:PropertiesList = {
    'callid': {
        label: _('Callid'),
    },
    'calldate': {
        label: _('Calldate'),
    },
    'duration': {
        label: _('Duration'),
    },
    'caller': {
        label: _('Caller'),
    },
    'callee': {
        label: _('Callee'),
    },
    'type': {
        label: _('Type'),
        enum: {
            'ondemand': _('On-demand'),
            'ddi': _('DDI'),
        }
    },
    'typeGhost': {
        label: _('Type'),
        //@TODO IvozProvider_Klear_Ghost_RecordingsType
    },
    'recordedFile': {
        label: _('Recorded file'),
    },
};

const recording:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Recording',
    title: _('Recording', {count: 2}),
    path: '/recordings',
    properties,
};

export default recording;