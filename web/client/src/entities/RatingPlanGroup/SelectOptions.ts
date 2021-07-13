import defaultEntityBehavior from '../DefaultEntityBehavior';

const RatingPlanGroupSelectOptions = (callback: Function) => {

    defaultEntityBehavior.fetchFks(
        //@TODO add endpoint
        '/rating_plan_groups',
        ['id', 'name'],
        (data:any) => {

            const options:any = {};
            for (const item of data) {
                //@TODO detect language
                options[item.id] = item.name.en;
            }

            callback(options);
        }
    );
}

export default RatingPlanGroupSelectOptions;