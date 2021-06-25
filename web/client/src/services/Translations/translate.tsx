import { Trans } from 'react-i18next';

export default function translate(key:string, values: any = {}, components: any = {}): React.ReactElement {
    return (
        <Trans
            defaults={key}
            values={values}
            components={components}
        />
    );

}
