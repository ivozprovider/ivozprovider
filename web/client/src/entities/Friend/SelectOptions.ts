import defaultEntityBehavior from '../DefaultEntityBehavior';

const FriendSelectOptions = (callback: Function) => {

    defaultEntityBehavior.fetchFks(
        '/friends',
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

export default FriendSelectOptions;