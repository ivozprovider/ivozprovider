##################
Installation Types
##################

*******************
Distributed Install
*******************

IvozProvider software is designed to run distributed between multiple systems
in what we call profiles:

Each profile is in charge of performing one of the platform functionalities:

    * Data storage
    * SIP Proxy
    * Application Server
    * Web portal

For each of this profiles, there's a virtual package that will install all the
required dependencies (see :ref:`Installing profile package`).

You can install as many instances as you want for each profile, but take into
account, that while some of them are designed to scale horizontally (for
example: asterisk or media-relays) others will require aditional software so the
systems that have the same profile are syncronized (for example: database
replication or http request balancing).

******************
StandAlone Install
******************

If you want a small installation to make a couple of tests or give a basic
service, we have designed all this configuration so they can work in a single
machine.

We have called this kind of installations **StandAlone** and we have also
created :ref:`Automatic ISO CD image` so you can install in a couple of minutes.
