import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import DdiSelectOptions from 'entities/Ddi/SelectOptions';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices, setFkChoices] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {
            if (loadingFks) {

                //@TODO domain
                //@TODO interCompany
                DdiSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            outgoingDdi: options,
                        }
                    });
                });

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
            legend: _('Outbound configuration'),
            fields: [
                'name',
                'outgoingDdi',
            ]
        },
        {
            legend: _('Inbound configuration'),
            fields: [
                'sendByEmail',
                'email',
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;