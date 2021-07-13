import React from 'react';
import { makeStyles, Theme } from '@material-ui/core/styles';
import {
  Button, Dialog, AppBar, Toolbar, IconButton, Typography, Slide
} from '@material-ui/core';
import CloseIcon from '@material-ui/icons/Close';
import { TransitionProps } from '@material-ui/core/transitions/transition';
import _ from 'services/Translations/translate';

const useStyles = makeStyles((theme: Theme) => ({
  appBar: {
    position: 'relative',
  },
  title: {
    marginLeft: theme.spacing(2),
    flex: 1,
  },
}));

const Transition = React.forwardRef<unknown, TransitionProps>((props: any, ref) => {
  return <Slide direction="up" ref={ref} {...props} />;
});

export default function FullScreenDialog(props: any) {
  const classes = useStyles();

  const { open, handleClose, apply } = props;

  return (
    <div>
      <Dialog fullScreen open={open} onClose={handleClose} TransitionComponent={Transition}>
        <AppBar className={classes.appBar}>
          <Toolbar>
            <IconButton edge="start" color="inherit" onClick={handleClose} aria-label="close">
              <CloseIcon />
            </IconButton>
            <Typography variant="h6" className={classes.title}>
              {_('Search')}
            </Typography>
            <Button autoFocus color="inherit" onClick={apply}>
              {_('Apply')}
            </Button>
          </Toolbar>
        </AppBar>
        {props.children}
      </Dialog>
    </div>
  );
}
