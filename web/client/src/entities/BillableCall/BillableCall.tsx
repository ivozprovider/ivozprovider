import SettingsApplications from '@material-ui/icons/SettingsApplications';
import EntityInterface, { PropertiesList } from 'entities/EntityInterface';
import genericForeignKeyResolver from 'services/genericForeigKeyResolver';
import EntityService from 'services/Entity/EntityService';
import defaultEntityBehavior from '../DefaultEntityBehavior';
import _ from 'services/Translations/translate';
import Form from './Form';

const properties:PropertiesList = {
    'startTime':  {
        label: 'Start time',
    },
    'callid':  {
        label: 'Call ID',
    },
    'caller':  {
        label: 'Caller',
    },
    'callee':  {
        label: 'Callee',
    },
    'destinationName':  {
        label: 'Destination',
    },
    'direction':  {
        label: 'Direction',
        enum: {
            'inbound': _('Inbound'),
            'outbound': _('Outbound'),
        }
    },
    'invoice':  {
        label: 'Invoice',
    },
    'price':  {
        label: 'Price',
    },
    'duration':  {
        label: 'Duration',
    },
    'cost':  {
        label: 'Cost',
    },
    'carrierName':  {
        label: 'Carrier',
    },
    'ratingPlanName':  {
        label: 'Rating plan',
    },
    'endpointType':  {
        label: 'Endpoint type',
    },
    'endpointId':  {
        label: 'Endpoint id',
    },
    'endpointName':  {
        label: 'Endpoint name',
    },
    'ddiProvider':  {
        label: 'DDI Provider',
    },
};

async function foreignKeyResolver(data: any, entityService: EntityService) {

    data = await genericForeignKeyResolver(
        data,
        'ddi',
        '/ddis',
        'ddi'
    );

    return data;
}

const billableCall:EntityInterface = {
    ...defaultEntityBehavior,
    icon: <SettingsApplications />,
    iden: 'BillableCall',
    title: _('External call', {count: 2}),
    path: '/billable_calls',
    properties,
    foreignKeyResolver,
    Form

};

export default billableCall;