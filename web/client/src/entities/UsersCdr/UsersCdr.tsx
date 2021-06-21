import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import _ from 'services/Translations/translate';
import defaultEntityBehavior from 'entities/DefaultEntityBehavior';

const properties:PropertiesList = {
    'startTime': {
        label: _('Start time'),
    },
    'duration': {
        label: _('Duration'),
    },
    'direction': {
        label: _('Direction'),
        enum: {
            'inbound': _("Inbound"),
            'outbound': _("Outbound"),
        }
    },
    'caller': {
        label: _('Source'),
    },
    'callee': {
        label: _('Destination'),
    },
    'callid': {
        label: _('Callid'),
    },
    'xcallid': {
        label: _('Xcallid'),
    },
    'callidHash': {
        label: _('CallidHash'),
    },
    'owner': {
        label: _('Owner'),
        //@TODO IvozProvider_Klear_Ghost_UsersCdr
    },
    'party': {
        label: _('Party'),
        //@TODO IvozProvider_Klear_Ghost_UsersCdr
    },
};

const extension:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'UsersCdr',
    title: _('Call', {count: 2}),
    path: '/users_cdrs',
    properties,
};

export default extension;