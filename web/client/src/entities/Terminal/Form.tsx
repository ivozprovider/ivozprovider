import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import TerminalModelSelectOptions from '../TerminalModel/SelectOptions';
import { useEffect, useState } from 'react';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices, setFkChoices] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {
            if (loadingFks) {
                TerminalModelSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            terminalModel: options
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
            legend: _('Login Info'),
            fields: [
                'name',
                'password',
            ]
        },
        {
            legend: _('Connection Info'),
            fields: [
                'allowAudio',
                'allowVideo',
                'directMediaMethod',
                't38Passthrough',
                'rtpEncryption',
            ]
        },
        {
            legend: _('Provisioning Info'),
            fields: [
                'terminalModel',
                'mac',
                'lastProvisionDate'
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;