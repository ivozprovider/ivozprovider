import EntityInterface from 'entities/EntityInterface';
import Calendar from './Calendar/Calendar';
import BillableCall from './BillableCall/BillableCall';
import Terminal from './Terminal/Terminal';
import User from './User/User';
import Extension from './Extension/Extension';
import Ddi from './Ddi/Ddi';
import Ivr from './Ivr/Ivr';
import HuntGroup from './HuntGroup/HuntGroup';
import Queue from './Queue/Queue';
import ConditionalRoute from './ConditionalRoute/ConditionalRoute';
import Friend from './Friend/Friend';
import ConferenceRoom from './ConferenceRoom/ConferenceRoom';
import ExternalCallFilter from './ExternalCallFilter/ExternalCallFilter';
import Schedule from './Schedule/Schedule';
import MatchList from './MatchList/MatchList';
import RouteLock from './RouteLock/RouteLock';
import OutgoingDdiRule from './OutgoingDdiRule/OutgoingDdiRule';
import PickUpGroup from './PickUpGroup/PickUpGroup';
import CallAcl from './CallAcl/CallAcl';
import Locution from './Locution/Locution';
import MusicOnHold from './MusicOnHold/MusicOnHold';
import Fax from './Fax/Fax';
import Service from './Service/Service';
import RatingProfile from './RatingProfile/RatingProfile';
import UsersCdr from './UsersCdr/UsersCdr';

interface EntityList {
  [name:string]: EntityInterface
}

const entities:EntityList = {
  Calendar,
  BillableCall,
  Terminal,
  User,
  Extension,
  Ddi,
  Ivr,
  HuntGroup,
  Queue,
  ConditionalRoute,
  Friend,
  ConferenceRoom,
  ExternalCallFilter,
  Schedule,
  MatchList,
  RouteLock,
  OutgoingDdiRule,
  PickUpGroup,
  CallAcl,
  Locution,
  MusicOnHold,
  Fax,
  Service,
  RatingProfile,
  UsersCdr
};

export default entities;
