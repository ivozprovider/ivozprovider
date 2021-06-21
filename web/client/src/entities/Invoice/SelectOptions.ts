import defaultEntityBehavior from '../DefaultEntityBehavior';

const InvoiceSelectOptions = (callback: Function) => {

    defaultEntityBehavior.fetchFks(
        '/invoices',
        ['id', 'number'],
        (data:any) => {
            const options:any = {};
            for (const item of data) {
                options[item.id] = item.number;
            }

            callback(options);
        }
    );
}

export default InvoiceSelectOptions;