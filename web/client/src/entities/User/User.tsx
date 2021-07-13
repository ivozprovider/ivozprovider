import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form'

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
    },
    'lastname': {
        label: _('Lastname'),
    },
    'email': {
        label: _('Email'),
        helpText: _("Used as voicemail reception and user portal credential"),
    },
    'pass': {
        label: _('Password'),
    },
    'active': {
        label: _('Active'),
    },
    'timezone': {
        label: _('Timezone'),
    },
    'transformationRuleSet': {
        label: _('Numeric transformation'),
    },
    'terminal': {
        label: _('Terminal'),
    },
    /*'statusIcon': _('Status'),*/
    'extension': {
        label: _('Screen Extension'),
    },
    'outgoingDdi': {
        label: _('Outgoing DDI'),
    },
    'outgoingDdiRule': {
        label: _('Outgoing DDI Rule'),
        helpText: _("Rules to manipulate outgoingDDI when user directly calls to external numbers."),
    },
    'callAcl': {
        label: _('Call ACL'),
    },
    'doNotDisturb': {
        label: _('Do not disturb'),
    },
    'isBoss': {
        label: _('Is boss'),
    },
    'bossAssistant': {
        label: _('Assistant'),
    },
    'bossAssistantWhiteList': {
        label: _('Boss Whitelist'),
        helpText: _("Origins matching this list will call directly to the user."),
    },
    'maxCalls': {
        label: _('Call waiting'),
        helpText: _("Limits received calls when already handling this number of calls. Set 0 for unlimited."),
    },
    'voicemailEnabled': {
        label: _('Voicemail enabled')
    },
    'voicemailLocution': {
        label:_('Voicemail Locution'),
    },
    'voicemailSendMail': {
        label:_('Voicemail send mail'),
    },
    'voicemailAttachSound': {
        label: _('Voicemail attach sound'),
    },
    'pickupGroupIds': {
        label: _('Pick Up Groups'),
    },
    'language': {
        label: _('Language'),
    },
    'externalIpCalls': {
        label: _('Calls from non-granted IPs'),
        helpText: _("Enable calling from non-granted IP addresses for this user. It limits the number of outgoing calls to avoid toll-fraud. 'None' value makes outgoing calls unlimited as long as company IP policy is fulfilled."),
    },
    'rejectCallMethod': {
        label: _('Call rejection method'),
    },
    'gsQRCode': {
        label: _('QR Code'),
        helpText: _("Add QR Code to user portal to provision GS Wave mobile softphone"),
    },
    'multiContact': {
        label: _('Multi contact'),
        helpText: _("Set to 'No' to call only to latest registered SIP device instead of making all registered devices ring."),
    }
};

const user:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'User',
    title: _('User', {count: 2}),
    path: '/users',
    properties,
    Form
};

export default user;