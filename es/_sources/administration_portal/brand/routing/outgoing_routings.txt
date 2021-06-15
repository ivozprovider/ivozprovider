.. _routes_weights:

*****************
Outgoing Routings
*****************

This is the main section in which routing policies are defined.

These are the fields that define an outgoing routing:

.. glossary::

    Client
        Should this route apply to all clients or just to one specific client?

    Routing Tag
        Routing tags allow clients to call to the same destination through different carriers. This field makes the
        route valid for just one routing tag (or for none).

    Call destination
        This groups allows selecting if this route applies for just one destination pattern, a group or faxes.

    Route type
        There are three kind of routes: static, LCR and block. In *static*, only one carrier is selected. In *LCR*, multiple carriers
        may be selected. In *block*, no carrier is selected as call will be dropped.

    Priority
        If a call matches several routes, it will be placed using the outgoing
        route with lower priority, as long as it is available.

    Weight
        If a call matches several routes with equal priority, weight will determine
        the proportion of calls that will use one route or another.

    Stopper
        If a call matches a route marked as stopper, matching routes with higher priority
        will be ignored. **Matching routes with SAME priority route WILL apply**.


Routing selection logic
=======================

When a client A calls to a destination B:

#. *Apply to all clients* routes with B destination pattern are selected.
#. *Apply to all clients* routes with group containing B destination are selected.
#. *Client A specific routes* routes with B destination pattern are selected.
#. *Client A specific routes* routes with group containing B destination are selected.
#. All these routes are ordered using *Priority* (lower priority apply first).
#. If any Blocking route has been selected, call is dropped.
#. The route with lower priority (e.g. prio Y) marked as *Stopper* (if any), will cause discarding routes with priority greater than Y+1.
#. Call will be routed using routes that remain after this process, priority will determine failover process, with will determine load balance (see below).


.. note:: As described above **All clients routes apply to all clients**, even if they have specific matching routes:

    * Use priority and stopper routes to achieve *Clients with specific routes don't use All clients routes* routing strategy.
    * If you want to achieve *Fallback for all clients* routing strategy, make sure you use high priority values.

.. tip:: Fax specific routes will apply first for both faxes sent via virtual faxing (see :ref:`faxes`) or T.38 capable devices.
         If no fax specific route is found for a given fax, routes will apply as for a normal voice call to that destination.

Load balancing
--------------

Priority and weight, are key parameters to achieve two interesting features too: **load-balancing** and **failover-routes**.

*Load-balancing* lets us distribute calls matching the same pattern using
several valid outgoing routes.

- Example 1

  - Route A: priority 1, weight 1
  - Route B: priority 1, weight 1

Call matching these routes will use route A for %50 of the calls and route B for
%50 of the calls.

- Example 2

  - Route A: priority 1, weight 1
  - Route B: priority 1, weight 2

Call matching these routes will use route A for %33 of the calls and route B for
%66 of the calls.

Failover routes
---------------

Failover route lets us use another route whenever the main route fails.

- Example

  - Route A: priority 1, weight 1
  - Route B: priority 2, weight 1

All calls matching these routes will try to use route A. In case the call fails,
the call will be placed using route B.

.. tip:: Although given examples use two routes, more routes can be chained and
   failover and load-balancing strategies can be combined.

LCR routes
==========

LCR (*Least Cost Routing*) routes may select more than one carrier. Whenever a LCR route is used, the platform will compute the call cost for that
given destination (for a 5 minutes duration) and will order them in increasing order.

.. note:: Carriers that cannot compute cost for a given destination are silently ignored (they are not used).

LCR and static routes combined
------------------------------

Carrier election process can combine static and LCR routes:

1. Static routes result in one carrier with the priority and the weight of the route.

2. LCR routes result in *n* carriers, ordered by call cost, all of them with the priority and the weight of the route.

3. Carriers are ordered using priority (ascending order).

4. Carrier's weight is used for load-balancing between carriers with same priority.

Blocking routes
===============

Blocking routes are the only routes with **priority 0**. This enforcement makes them be **evaluated first**. They are
*Stopper* routes as whenever they apply, call is dropped and no further route is evaluated.

.. tip:: Using these routes, it is easy to make a group with unwanted call prefixes and reject all calls to those
         destinations for every client (or for one particular client).
