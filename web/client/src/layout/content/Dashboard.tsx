import { withRouter } from "react-router-dom";
import entities from '../../entities/index';
import { Link } from "react-router-dom";
import { Grid } from "@material-ui/core";
import _ from 'services/Translations/translate';

interface dashboardProps {
}

const Dashboard = (props:dashboardProps) => {

  return (
    <Grid container spacing={3}>
        <Grid item xs={6}>
            <ul>
                <li>
                    <Link to={entities.User.path}>
                        {entities.User.title}
                    </Link>
                </li>
                <li>
                    <Link to={entities.Terminal.path}>
                        {entities.Terminal.title}
                    </Link>
                </li>
                <li>
                    <Link to={entities.Extension.path}>
                        {entities.Extension.title}
                    </Link>
                </li>
                <li>
                    <Link to={entities.Ddi.path}>
                        {entities.Ddi.title}
                    </Link>
                </li>
                <li className="submenu">
                    <h3>{_('Routing endpoints')}</h3>
                    <div>
                        <ul>
                            <li>
                                <Link to={entities.Ivr.path}>
                                    {entities.Ivr.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.HuntGroup.path}>
                                    {entities.HuntGroup.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.Queue.path}>
                                    {entities.Queue.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.ConditionalRoute.path}>
                                    {entities.ConditionalRoute.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.Friend.path}>
                                    {entities.Friend.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.ConferenceRoom.path}>
                                    {entities.ConferenceRoom.title}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li className="submenu">
                    <h3>{_('Routing tools')}</h3>
                    <div>
                        <ul>
                            <li>
                                <Link to={entities.ExternalCallFilter.path}>
                                    {entities.ExternalCallFilter.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.Calendar.path}>
                                    {entities.Calendar.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.Schedule.path}>
                                    {entities.Schedule.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.MatchList.path}>
                                    {entities.MatchList.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.RouteLock.path}>
                                    {entities.RouteLock.title}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </Grid>
        <Grid item xs={6}>
            <ul>
                <li className="submenu">
                    <h3>{_('User configuration')}</h3>
                    <div>
                        <ul>
                            <li>
                                <Link to={entities.OutgoingDdiRule.path}>
                                    {entities.OutgoingDdiRule.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.PickUpGroup.path}>
                                    {entities.PickUpGroup.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.CallAcl.path}>
                                    {entities.CallAcl.title}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li className="submenu">
                    <h3>{_('Multimedia')}</h3>
                    <div>
                        <ul>
                            <li>
                                <Link to={entities.Locution.path}>
                                    {entities.Locution.title}
                                </Link>
                            </li>
                            <li>
                                <Link to={entities.MusicOnHold.path}>
                                    {entities.MusicOnHold.title}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <Link to={entities.Fax.path}>
                        {entities.Fax.title}
                    </Link>
                </li>
                <li>
                    <Link to={entities.Service.path}>
                        {entities.Service.title}
                    </Link>
                </li>
                <li>
                    <Link to={entities.RatingProfile.path}>
                        {entities.RatingProfile.title}
                    </Link>
                </li>
                <li>
                    Invoices
                </li>
                <li className="submenu">
                    <h3>{_('Calls')}</h3>
                    <div>
                        <ul>
                            <li>
                                Active calls
                            </li>
                            <li>
                                Call registry
                            </li>
                            <li>
                                External calls
                            </li>
                            <li>
                                Call CSV schedulers
                            </li>
                            <li>
                                Call recordings
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </Grid>
    </Grid>

  );
};

export default withRouter<any, any>(Dashboard);