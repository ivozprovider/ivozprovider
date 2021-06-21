/* eslint-disable no-script-url */

import React, { useState, MouseEvent } from 'react';
import {
  Table, TablePagination, TableBody, Tooltip, Fab, makeStyles, Chip
} from '@material-ui/core';
import { Link } from "react-router-dom";
import SearchIcon from '@material-ui/icons/Search';
import QueueIcon from '@material-ui/icons/Queue';
import ContentFilter, { getFilterTypeLabel, getFilterLabel } from './ContentFilter';
import ContentTableHead from './ContentTableHead';
import FilterIconFactory from 'icons/FilterIconFactory';
import ContentTableRow from './ContentTableRow';
import EntityService from 'services/Entity/EntityService';

interface propsType {
  loading?: boolean,
  path: string,
  setLoading: Function,
  entityService: EntityService,
  headers: { [id: string]: string },
  rowsPerPage: number,
  setRowsPerPage: Function,
  orderBy: string,
  orderDirection: string,
  setSort: Function,
  page: number,
  setPage: Function,
  rows: any,
  where: any,
  setWhere: Function
}

export default function ContentTable(props: propsType) {
  const classes = useStyles();
  const {
    path,
    entityService,
    headers,
    rows,
    rowsPerPage,
    setRowsPerPage,
    orderBy,
    orderDirection,
    setSort,
    page,
    setPage,
    setLoading,
    where,
    setWhere
  } = props;

  const columns = entityService.getColumns();
  const acl = entityService.getAcls();

  const [showFilters, setShowFilters] = useState(false);
  const handleFiltersClose = (event: any) => {
    setShowFilters(false);
  };

  const filterButtonHandler = (event: MouseEvent<HTMLButtonElement>) => {
    setShowFilters(!showFilters);
  };

  const [criteria, setCriteria] = useState<any>(where);

  const removeFilter = (fldName: string) => {

    delete criteria[fldName];
    setWhereCondition({
      ...criteria
    });
  }

  const setWhereCondition = (where: any) => {
    setCriteria(where);
    setWhere(where);
  }

  return (
    <React.Fragment>
      <div className={classes.title}>
        <div />
        <div className={classes.fabContainer}>
          <Tooltip title="Search">
            <Fab
              color="secondary" size="small" variant="extended" className={classes.fab}
              onClick={filterButtonHandler}
            >
              <SearchIcon />
            </Fab>
          </Tooltip>
          {acl.create && <Link to={`${path}/create`} className={classes.link}>
            <Tooltip title="Add">
              <Fab color="secondary" size="small" variant="extended">
                <QueueIcon />
              </Fab>
            </Tooltip>
          </Link>}
        </div>
      </div>

      <ContentFilter
        entityService={entityService}
        open={showFilters}
        handleClose={handleFiltersClose}
        currentFilter={criteria}
        setFilters={setWhereCondition}
        path={path}
      />

      <div>
        {Object.keys(criteria).map((fldName: string, idx: number) => {

          if (!criteria[fldName]) {
            return null;
          }

          const fieldStr = columns[fldName].label;

          const icon = (
            <div className={classes.chipIconContainer}>
              <span className={classes.chipPrefix}>{fieldStr}</span>
              <FilterIconFactory name={criteria[fldName].type} fontSize='small' />
            </div>
          );

          const tooltip = (<span>
            {fieldStr} &nbsp;
            {getFilterTypeLabel(criteria[fldName].type)} &nbsp;
            {getFilterLabel(criteria[fldName])}
          </span>);

          return (
            <Tooltip
              key={idx}
              title={tooltip}
            >
              <Chip
                icon={icon}
                label={getFilterLabel(criteria[fldName])}
                onDelete={() => {
                  removeFilter(fldName);
                }}
                className={classes.chip}
              />
            </Tooltip>
          );
        })}
      </div>

      <Table size="medium">
        <ContentTableHead
          path={path}
          entityService={entityService}
          classes={classes}
          order={orderDirection}
          orderBy={orderBy}
          onRequestSort={setSort}
        />
        <TableBody>
          {rows.map((row: any, key: any) => {
            return (
              <ContentTableRow
                entityService={entityService}
                row={row}
                key={key}
                path={path}
                setLoading={setLoading}
              />
            );
          })}
        </TableBody>
      </Table>
      <TablePagination
        rowsPerPageOptions={[5, 10, 25]}
        component="div"
        count={parseInt(headers['x-total-items'], 10)}
        rowsPerPage={rowsPerPage}
        page={page - 1}
        backIconButtonProps={{
          'aria-label': 'previous page',
        }}
        nextIconButtonProps={{
          'aria-label': 'next page',
        }}
        onChangePage={(event: any, newPage: any) => {
          setPage(newPage + 1);
          setLoading(true);
        }}
        onChangeRowsPerPage={(newRowsPerpage: any) => {
          setRowsPerPage(newRowsPerpage.target.value);
          setLoading(true);
        }}
      />
    </React.Fragment >
  );
}


const useStyles = makeStyles((theme: any) => ({
  title: {
    display: 'flex',
    justifyContent: 'space-between'
  },
  link: {
    textDecoration: 'none',
    color: 'inherit',
  },
  fabContainer: {
    alignContent: 'flex-end'
  },
  fab: {
    marginRight: '10px'
  },
  visuallyHidden: {
    border: 0,
    clip: 'rect(0 0 0 0)',
    height: 1,
    margin: -1,
    overflow: 'hidden',
    padding: 0,
    position: 'absolute',
    top: 20,
    width: 1,
  },
  chip: {
    margin: '0 5px',
  },
  chipIconContainer: {
    paddingTop: '5px',
  },
  chipPrefix: {
    display: 'inline-flex',
    userSelect: 'none',
    paddingLeft: '12px',
    paddingRight: '5px',
    verticalAlign: 'super',
  }
}));