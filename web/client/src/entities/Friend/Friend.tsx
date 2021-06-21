import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';
import Form from './Form';

const properties:PropertiesList = {
    'name': {
        label: _('Name'),
        helpText: _("Allowed characters: a-z, A-Z, 0-9, underscore and '*'")
    },
    'domain': {
        label: _('Domain'),
    },
    'description': {
        label: _('Description'),
    },
    'transport': {
        label: _('Transport'),
        enum: {
            'udp': _('UDP'),
            'tcp': _('TCP'),
            'tls': _('TLS'),
        }
    },
    'ip': {
        label: _('Destination IP address'),
        helpText: _('e.g. 8.8.8.8')
    },
    'port': {
        label: _('Port'),
    },
    'password': {
        label: _('Password'),
        helpText: _("Minimal length 10, including 3 uppercase letters, 3 lowercase letters, 3 digits and one character in '+*_-'"),
    },
    'callACL': {
        label: _('Call ACL'),
    },
    'transformationRuleSet': {
        label: _('Numeric transformation'),
    },
    'outgoingDdi': {
        label: _('Fallback Outgoing DDI'),
        helpText: _("This DDI will be used if presented DDI doesn't match any of the company DDIs")
    },
    'priority': {
        label: _('Priority'),
    },
    'disallow': {
        label: _('Disallowed audio codecs'),
    },
    'allow': {
        label: _('Allowed audio codecs'),
        enum: {
            'alaw': _('alaw - G.711 a-law'),
            'ulaw': _('ulaw - G.711 u-law'),
            'gsm': _('gsm - GSM'),
            'speex': _('speex - SpeeX 32khz'),
            'g722': _('g722 - G.722'),
            'g726': _('g726 - G.726 RFC3551'),
            'g729': _('g729 - G.729A'),
            'ilbc': _('ilbc - iLBC'),
            'opus': _('opus - Opus codec'),
        }
    },
    'directMediaMethod': {
        label: _('CallerID update method'),
        enum: {
            'invite': _('invite'),
            'update': _('update'),
        }
    },
    'calleridUpdateHeader': {
        label: _('CallerID update header'),
        enum: {
            'pai': _('P-Asserted-Identity (PAI)'),
            'rpid': _('Remote-Party-ID (RPID)'),
        }
    },
    'updateCallerid': {
        label: _('Update CallerID?'),
        enum: {
            'yes': _('Yes'),
            'no': _('No'),
        }
    },
    'fromDomain': {
        label: _('From domain'),
    },
    'fromUser': {
        label: _('From user'),
    },
    'directConnectivity': {
        label: _('Connectivity mode'),
        enum: {
            'yes': _('Direct'),
            'no': _('Register'),
            'intervpbx': _('Inter vPBX'),
        }
    },
    'interCompany': {
        label: _('Target client'),
    },
    'ddiIn': {
        label: _('DDI In'),
        enum: {
            'yes': _('Yes'),
            'no': _('No'),
        },
        helpText: _("If set to 'Yes', set destination (R-URI and To) to called DDI/number when calling to this friend.")
    },
    'language': {
        label: _('Language'),
    },
    't38Passthrough': {
        label: _('Enable T.38 passthrough'),
        enum: {
            'yes': _('Yes'),
            'no': _('No'),
        },
    },
    'alwaysApplyTransformations': {
        label: _('Always apply transformations'),
        enum: {
            '0': _('Yes'),
            '1': _('No'),
        },
        helpText: _("Enable to force numeric transformation on numbers in Extensions or numbers matching any Friend regexp. Otherwise, those numbers won't traverse numeric transformations rules.")
    },
    'rtpEncryption': {
        label: _('RTP encryption'),
        enum: {
            '0': _('Yes'),
            '1': _('No'),
        },
        helpText: _("Enable to force audio encryption. Call won't be established unless it is encrypted.")
    },
    'multiContact': {
        label: _('Multi contact'),
        enum: {
            '0': _('Yes'),
            '1': _('No'),
        },
        helpText: _("Set to 'No' to call only to latest registered SIP device instead of making all registered devices ring.")
    },
};

const friend:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'Friend',
    title: _('Friend', {count: 2}),
    path: '/friends',
    properties,
    Form
};

export default friend;