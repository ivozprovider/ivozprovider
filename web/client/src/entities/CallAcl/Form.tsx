import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices/*, setFkChoices*/] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {
            if (loadingFks) {
                /*LocutionSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            timeoutLocution: options,
                            fullLocution: options,
                            periodicAnnounceLocution: options,
                        }
                    });
                });*/

                setLoadingFks(false);
            }

            return function umount() {
                setMounted(false);
            };
        },
        [loadingFks, fkChoices]
    );

    const groups:Array<FieldsetGroups> = [
        {
            legend: _('ACL data'),
            fields: [
                'name',
                'defaultPolicy',
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;