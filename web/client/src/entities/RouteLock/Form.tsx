import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const groups:Array<FieldsetGroups> = [
        {
            legend: _('Basic Configuration'),
            fields: [
                'name',
                'description',
                'open',
            ]
        },
    ];

    return (<DefaultEntityForm groups={groups} {...props}  />);
}

export default Form;