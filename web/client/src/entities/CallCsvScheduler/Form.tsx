import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import DdiSelectOptions from 'entities/Ddi/SelectOptions';
import CarrierSelectOptions from 'entities/Carrier/SelectOptions';
import RetailAccountSelectOptions from 'entities/RetailAccount/SelectOptions';
import ResidentialDeviceSelectOptions from 'entities/ResidentialDevice/SelectOptions';
import UserSelectOptions from 'entities/User/SelectOptions';
import FaxSelectOptions from 'entities/Fax/SelectOptions';
import FriendSelectOptions from 'entities/Friend/SelectOptions';
import DdiProviderSelectOptions from 'entities/DdiProvider/SelectOptions';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices, setFkChoices] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {

            if (loadingFks) {

                DdiSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            ddi: options
                        }
                    });
                });

                CarrierSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            carrier: options
                        }
                    });
                });

                RetailAccountSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            retailAccount: options
                        }
                    });
                });

                ResidentialDeviceSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            residentialDevice: options
                        }
                    });
                });

                UserSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            user: options
                        }
                    });
                });

                FaxSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            fax: options
                        }
                    });
                });

                FriendSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            friend: options
                        }
                    });
                });

                DdiProviderSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            ddiProvider: options
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
            legend: _('Basic Information'),
            fields: [
                'name',
                'email',
            ]
        },
        {
            legend: _('Filters'),
            fields: [
                'callDirection',
                'ddi',
                'retailAccount',
                'residentialDevice',
                'user',
                'fax',
                'friend',
            ]
        },
        {
            legend: _('Time Information'),
            fields: [
                'frequency',
                'unit',
                'nextExecution',
                'lastExecution',
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;