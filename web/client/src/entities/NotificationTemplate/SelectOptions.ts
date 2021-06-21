import defaultEntityBehavior from '../DefaultEntityBehavior';

const NotificationTemplateSelectOptions = (callback: Function) => {

    defaultEntityBehavior.fetchFks(
        '/notification_templates',
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

export default NotificationTemplateSelectOptions;