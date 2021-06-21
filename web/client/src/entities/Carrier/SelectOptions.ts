import defaultEntityBehavior from '../DefaultEntityBehavior';

const CarrierSelectOptions = (callback: Function) => {

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