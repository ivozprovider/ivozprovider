import defaultEntityBehavior from '../DefaultEntityBehavior';

const CarrierSelectOptions = (callback: Function) => {

    callback({}); //@TODO missing in the API
    return;

    defaultEntityBehavior.fetchFks(
        '/carriers',
        ['id', 'name'],
        (data:any) => {
            const options:any = {};
            for (const item of data) {
                options[item.id] = item.name;
            }

            callback(options);
        }
    );
}

export default CarrierSelectOptions;