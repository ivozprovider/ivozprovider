import { withRouter } from "react-router-dom";
import {
  FormControl,
  InputLabel,
  MenuItem,
  Select,
  OutlinedInput
} from '@material-ui/core';
import EntityInterface from 'entities/EntityInterface';

interface SelectProps extends EntityInterface {
  name: string,
  label: string,
  value:any,
  required:boolean,
  disabled:boolean,
  onChange: (event: any) => void,
  choices: any
}

const Dropdown = (props: SelectProps) => {

    const { name, label, value, required, disabled, onChange, choices } = props;
    const labelId = `${name}-label`;

    return (
      <FormControl fullWidth={true} variant="outlined">
        <InputLabel required={required} shrink={true} id={labelId}>{label}</InputLabel>
        <Select
            value={value}
            disabled={disabled}
            onChange={onChange}
            displayEmpty={true}
            input={
                <OutlinedInput
                  name={name}
                  type="text"
                  label={label}
                  notched={true}
              />
            }
        >
            {Object.entries(choices).map(([value, label]:[any, any], key: number) => {
                return (<MenuItem value={value} key={key}>{label}</MenuItem>);
            })}
        </Select>
      </FormControl>
    );
};

export default withRouter<any, any>(Dropdown);
