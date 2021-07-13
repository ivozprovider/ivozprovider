import defaultEntityBehavior, { FieldsetGroups } from '../DefaultEntityBehavior';
import { useEffect, useState } from 'react';
import TerminalSelectOptions from 'entities/Terminal/SelectOptions';
import CallAclSelectOptions from 'entities/CallAcl/SelectOptions';
import LocutionSelectOptions from 'entities/Locution/SelectOptions';
import OutgoingDdiRuleSelectOptions from 'entities/OutgoingDdiRule/SelectOptions';
import DdiSelectOptions from 'entities/Ddi/SelectOptions';
import TimezoneSelectOptions from 'entities/Timezone/SelectOptions';
import ExtensionSelectOptions from 'entities/Extension/SelectOptions';
import LanguageSelectOptions from 'entities/Language/SelectOptions';
import TransformationRuleSetSelectOptions from 'entities/TransformationRuleSet/SelectOptions';
import MatchListSelectOptions from 'entities/MatchList/SelectOptions';
import UserSelectOptions from './SelectOptions';
import _ from 'services/Translations/translate';

const Form = (props:any) => {

    const DefaultEntityForm = defaultEntityBehavior.Form;

    const [fkChoices, setFkChoices] = useState<any>({});
    const [, setMounted] = useState<boolean>(true);
    const [loadingFks, setLoadingFks] = useState<boolean>(true);

    useEffect(
        () => {

            if (loadingFks) {

                UserSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            bossAssistant: options
                        }
                    });
                });

                MatchListSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            bossAssistantWhiteList: options
                        }
                    });
                });

                TransformationRuleSetSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            transformationRuleSet: options
                        }
                    });
                });

                LanguageSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            language: options
                        }
                    });
                });

                ExtensionSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            extension: options
                        }
                    });
                });

                TimezoneSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            timezone: options
                        }
                    });
                });

                DdiSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            outgoingDdi: options
                        }
                    });
                });

                OutgoingDdiRuleSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            outgoingDdiRule: options
                        }
                    });
                });

                LocutionSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            voicemailLocution: options
                        }
                    });
                });

                TerminalSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            terminal: options
                        }
                    });
                });

                CallAclSelectOptions((options:any) => {
                    setFkChoices((fkChoices:any) => {
                        return {
                            ...fkChoices,
                            callAcl: options
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
            legend: _('Personal data'),
            fields: [
                'name',
                'language', //
                'lastname',
                'email',
            ]
        },
        {
            legend: _('Geographic Configuration'),
            fields: [
                //'language',
                'timezone',
                'transformationRuleSet',
            ]
        },
        {
            legend: _('Login Info'),
            fields: [
                'active',
                'pass',
                'gsQRCode',
            ]
        },
        {
            legend: _('Boss-Assistant'),
            fields: [
                'isBoss',
                'bossAssistant',
                'bossAssistantWhiteList',
            ]
        },
        {
            legend: _('Basic Configuration'),
            fields: [
                'terminal',
                'extension',
                'outgoingDdi',
                'outgoingDdiRule',
                'callAcl',
                'doNotDisturb',
                'maxCalls',
                'externalIpCalls',
                'multiContact',
                'rejectCallMethod',
            ]
        },
        {
            legend: _('Voicemail'),
            fields: [
                'voicemailEnabled',
                'voicemailLocution',
                'voicemailSendMail',
                'voicemailAttachSound',
            ]
        },
        {
            legend: _('Group belonging'),
            fields: [
                'pickupGroupIds',
                'HuntGroupsRelUsers',
            ]
        }
    ];

    return (
        <DefaultEntityForm fkChoices={fkChoices} groups={groups} {...props}  />
    );
}

export default Form;