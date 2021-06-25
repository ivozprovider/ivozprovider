import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import CountrySelectOptions from 'entities/Country/SelectOptions';
import IvrSelectOptions from 'entities/Ivr/SelectOptions';
import HuntGroupSelectOptions from 'entities/HuntGroup/SelectOptions';
import ConferenceRoomSelectOptions from 'entities/ConferenceRoom/SelectOptions';
import UserSelectOptions from 'entities/User/SelectOptions';
import QueueSelectOptions from 'entities/Queue/SelectOptions';
import ConditionalRouteSelectOptions from 'entities/ConditionalRoute/SelectOptions';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices, setFkChoices] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {

            if (loadingFks) {

                CountrySelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            numberCountry: options
                        }
                    });
                });

                IvrSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            ivr: options
                        }
                    });
                });

                HuntGroupSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            huntGroup: options
                        }
                    });
                });

                ConferenceRoomSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            conferenceRoom: options
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

                QueueSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            queue: options
                        }
                    });
                });

                ConditionalRouteSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            conditionalRoute: options
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
            legend: '',
            fields: [
                'number',
            ]
        },
        {
            legend: '',
            fields: [
                'routeType',
                'ivr',
                'huntGroup',
                'conferenceRoom',
                'user',
                'numberCountry',
                'numberValue',
                'friendValue',
                'queue',
                'conditionalRoute',
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;