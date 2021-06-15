.. _call_recordings:

###############
Call recordings
###############

.. attention:: Beware that local legislation may enforce to announce that the 
   call is being recorded (sometimes to both parties). You should include 
   a recording disclaimer in your welcome locutions for DDIs with automatic 
   recording enabled.

IvozProvider supports two different ways of recording calls:

- **Automatic recordings** for the incoming/outgoing calls that use a 
  :ref:`External DDI <ddis>`.
  
- **On demand recordings** requested by a user during a call.

************************
Automatic DDI recordings
************************

In this type of recording, **the whole conversation will be recorded**: from 
the start until it finishes. 

Two different scenarios:

- **Incoming calls to a DDI**: The call will continue until the external 
  dialer hangups (no matter whom is talking to).

- **Outgoing calls using a DDI** as :ref:`Outgoing DDI <ddis>`: the
  recording will continue as long as the external destination keeps in the
  conversation.

.. attention:: Take into account that the call will be recorded while the 
   external entity is present, even it the call is being transferred between
   multiple users of the platform. 

.. rubric:: Record all the calls of a DDI

To enable this feature, edit the DDI and configure the field under the section
recording data: 


There are 4 available options:

- Disable recordings
- Enable incoming recordings
- Enable outgoing recordings
- Enable all call recordings 

********************
On demand recordings
********************

The *on-demand* recordings must be enabled by the *brand administrator* for the
clients that request it. This can be done in the client edit screen:


.. warning:: Contrary to the :ref:`Services <services>` mentioned in the
   previous section, the on demand record are activated within a conversation.

Contrary to automatic ones, on demand recording can be stopped using the same
process that started them.

Activated using the *Record* key
================================

Some terminals (for example, *Yealink*) support sending a `SIP INFO 
<https://tools.ietf.org/html/rfc6086>`_ message during the conversation with a
special *Record* header (see `reference <http://www.yealink.com/Upload/document/UsingCallRecordingFeatureonYealinkPhones/UsingCallRecordingFeatureonYealinkSIPT2XPphonesRev_610-20561729764.pdf>`_). 
This is not a standard for the protocol, but being Yealink one of the supported
manufacturers of the solution, we include this kind of on-demand recording.

.. important:: For this recording requests, the configured code doesn't matter
   but the client still must have on demand records enabled. 

To start or stop this kind of recordings, just press the Record key in the 
terminal and the system will handle the sent message.

Activated using *DTMF* codes
============================

The more traditional approach for this feature is to press a combination of 
keys during the call. Some notification will be played and the recording will 
start or stop. This combination is sent to the system using `DTMF tones
<https://es.wikipedia.org/wiki/Marcaci%C3%B3n_por_tonos>`_ using the same audio
stream that the conversation (as mentioned in `RFC 4733 
<https://tools.ietf.org/html/rfc4733>`_).

IvozProvider supports this kind of on demand record activation but with an 
important downside. In order to capture this codes, the pbx must process each
audio packet to detect the code, avoiding the direct flow of media between the
final endpoints.

.. important:: Enabling this record mode highly affects the performance of the
   platform. Use at your own risk.

***************
Recordings list
***************

The *client administrator* can access to all the recordings in the section 
**Client configuration** > **Calls** > **Call recordings**:

    - Recordings can be heard from the *web* or downloaded in MP3 format.

    - If the recording has been started on demand, it will also include the user
      that requested it.

.. tip:: Recording removal button is shown only if **Allow Client to remove recordings** is enabled
         for the client in *Client configuration*.
