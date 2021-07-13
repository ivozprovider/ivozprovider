import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import CallAclSelectOptions from 'entities/CallAcl/SelectOptions';
import TransformationRuleSetSelectOptions from 'entities/TransformationRuleSet/SelectOptions';
import DdiSelectOptions from 'entities/Ddi/SelectOptions';
import LanguageSelectOptions from 'entities/Language/SelectOptions';
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

                CallAclSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            callAcl: options,
                        }
                    });
                });

                TransformationRuleSetSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            transformationRuleSet: options,
                        }
                    });
                });

                DdiSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            outgoingDdi: options,
                        }
                    });
                });

                LanguageSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            language: options,
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
            legend: _('Basic Configuration'),
            fields: [
                'directConnectivity',
                'priority',
                'description',
                'name',
                'password',
                //'interCompany',
                'transport',
                'ip',
                'port',
                //'alwaysApplyTransformations',
            ]
        },
        {
            legend: _('Geographic Configuration'),
            fields: [
                'language',
                'transformationRuleSet',
            ]
        },
        {
            legend: _('Outgoing Configuration'),
            fields: [
                'callAcl',
                'outgoingDdi',
            ]
        },
                {
            legend: _('Advanced Configuration'),
            fields: [
                //'fromUser',
                'fromDomain',
                'allow',
                'ddiIn',
                't38Passthrough',
                //'rtpEncryption',
                //'multiContact',
            ]
        },
    ];

    return (<DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />);
}

export default Form;