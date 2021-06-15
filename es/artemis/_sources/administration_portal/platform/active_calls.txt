############
Active calls
############

This section allows main operator and brand operator view **current active external calls**.

.. warning:: Internal calls won't be listed.

These are columns shown:

.. glossary::

    Duration
        Show call establishment duration during establishment and call duration during ongoing call. It also shows
        direction (inbound/outbound) and call state information, as explained below.

    Brand
        Brand making a given call (only shown at god level).

    Client
        Client making a given call.

    Caller
        Call source number in E.164.

    Callee
        Call destination number in E.164.

    Carrier
        Carrier/DDI Provider used in given call.

Call state
==========

Call state follows `Dialog State Machine proposed in RFC4235 <https://tools.ietf.org/html/rfc4235#section-3.7.1>`_:

- **Trying**

    - INVITE sent, someone is trying to make a new call.
    - Shown as *Call Setup* in this section.

- **Proceeding**

    - Provisional response from middle proxies received (usually 100 Trying).
    - This state is ignored in this section.

- **Early**

    - Provisional response from final party received (usually 180 Ringing).
    - Shown as *Ringing* in this section.

- **Confirmed**

    - 200 OK received, call confirmed, parties talking.
    - Shown as *In call* in this section.

- **Terminated**

    - BYE/CANCEL/error-response (>300) received, call finished.
    - Call vanishes to show this status.


.. rubric:: Example 1: Successful call

A successful call traverses this states:

- Trying -> Proceeding (optional) -> Early (optional) -> Confirmed -> Terminated

That will be coded in this section as:

- Call Setup -> Ringing (optional) -> In call -> Call vanishes

.. rubric:: Example 2: Unsuccessful call

An unsuccessful call traverses this states:

- Trying -> Proceeding (optional) -> Early (optional) -> Terminated

That will be show in this section as:

- Call Setup -> Ringing (optional) -> Call vanishes