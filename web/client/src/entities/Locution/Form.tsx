import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const groups:Array<FieldsetGroups> = [
        {
            legend: '',
            fields: [
                'name',
                //'recordingExtension',
            ]
        },
        /*{
            legend: '',
            fields: [
                'originalFile',
                'encodedFile',
            ]
        }*/
    ];

    return (<DefaultEntityForm groups={groups} {...props}  />);
}

export default Form;