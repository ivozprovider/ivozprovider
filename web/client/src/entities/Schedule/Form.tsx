import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const groups:Array<FieldsetGroups> = [
        {
            legend: '',
            fields: [
                'name',
            ]
        },
        {
            legend: '',
            fields: [
                'timeIn',
                'timeout',
            ]
        },
        {
            legend: '',
            fields: [
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday',
                'sunday',
            ]
        },
    ];

    return (<DefaultEntityForm groups={groups} {...props}  />);
}

export default Form;