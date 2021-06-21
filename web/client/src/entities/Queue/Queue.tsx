import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form'

const properties:PropertiesList = {
    'id': {
        label: _('Id')
    },
    'name': {
        label:_('Name'),
        helpText: _("Allowed characters: a-z, A-Z, 0-9, underscore and '-'"),
    },
    'maxWaitTime': {
        label:_('Max wait time'),
        helpText: _('If no queue member answers before time this seconds, the timeout queue logic will be activated. Leave empty to disable.'),
    },
    'timeoutLocution': {
        label:_('Locution'),
    },
    'timeoutTargetType': {
        label:_('Timeout route'),
        enum: {
            '__null__': _("Unassigned"),
            'number': _('Number'),
            'extension': _('Extension'),
            'voicemail': _('Voicemail'),
        }
    },
    'timeoutNumberCountry': {
        label:_('Country'),
    },
    'timeoutNumberValue': {
        label:_('Number'),
    },
    'timeoutExtension': {
        label:_('Extension'),
    },
    'timeoutVoiceMailUser': {
        label:_('Voicemail'),
    },
    'maxlen': {
        label:_('Max queue length'),
        helpText: _('Max number of unattended calls that this queue can have. When this value has been reached, full queue logic will be activated on new calls. Leave empty to disable.'),
    },
    'fullLocution': {
        label:_('Full queue Locution'),
    },
    'fullTargetType': {
        label:_('Full queue route'),
        enum: {
            '__null__': _("Unassigned"),
            'number': _('Number'),
            'extension': _('Extension'),
            'voicemail': _('Voicemail'),
        }
    },
    'fullNumberCountry': {
        label: _('Country'),
    },
    'fullNumberValue': {
        label: _('Number'),
    },
    'fullExtension': {
        label: _('Extension'),
    },
    'fullVoiceMailUser': {
        label: _('Voicemail'),
    },
    'periodicAnnounceLocution': {
        label: _('Periodic Annouce Locution'),
        helpText: _("Locution periodically played to calls that are queued"),
    },
    'periodicAnnounceFrequency': {
        label: _('Periodic Announce Frequency'),
    },
    'memberCallRest': {
        label: _('Member rest seconds'),
        helpText: _("Time in seconds that member won't be disturbed after attending a queue call"),
    },
    'memberCallTimeout': {
        label: _('Member call seconds'),
        helpText: _('Time in seconds queue calls will ring members')
    },
    'strategy': {
        label: _('Strategy'),
        enum: {
            'ringall': _('Ring all'),
            'leastrecent': _('Least recent'),
            'fewestcalls': _('Fewest calls'),
            'random': _('Random'),
            'rrmemory': _('Round Robin memory'),
            'linear': _('Linear'),
        },
        helpText: _('Determines the order current priority members will be called'),
    },
    'weight': {
        label: _('Weight'),
    },
};

const queue:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Queue',
    title: _('Queue', {count: 2}),
    path: '/queues',
    properties,
    Form
};

export default queue;