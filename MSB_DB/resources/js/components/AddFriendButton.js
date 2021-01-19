import React from 'react';
import ReactDOM from 'react-dom';

class AddFriendButton extends React.Component {
    constructor(props) {
        super(props)

        this.friendsAppearance = "btn btn-outline-success";
        this.pendingFriendsAppearance = "btn btn-outline-danger";
        this.addFriendApperance = "btn btn-outline-secondary";
        this.friends = "Added";
        this.pendingFriends = "Accept";
        this.addFriend = "Add"
        this.userId = props.userId;
        this.friendId = props.friendId;

        if (props.friends == 1) {
            this.state = { buttonText: this.friends, appearance: this.friendsAppearance, value: props.friends };
        } else if (props.friends == 0) {
            this.state = { buttonText: this.pendingFriends, appearance: this.pendingFriendsAppearance, value: props.friends };
        } else {
            this.state = { buttonText: this.addFriend, appearance: this.addFriendApperance, value: props.friends };
        }
        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        axios.post('/profile/' + this.friendId + "/af", { status: this.state.value })
            .then(res => {
                if (res.data.status == 1) {
                    this.setState({ buttonText: this.friends, appearance: this.friendsAppearance, value: res.data.status });
                } else if (res.data.status == 0) {
                    this.setState({ buttonText: this.pendingFriends, appearance: this.pendingFriendsAppearance, value: res.data.status });
                } else {
                    this.setState({ buttonText: this.addFriend, appearance: this.addFriendApperance, value: res.data.status });
                }
                console.log(this.state.value);
            }).catch(err => {
                console.log(err)
            })
    }

    render() {
        return (
            <button type="button" onClick={this.handleClick} className={this.state.appearance}>{this.state.buttonText}</button>
        )
    }
}

export default AddFriendButton;

if (document.getElementById('AddFriendButton')) {
    const el = document.getElementById('AddFriendButton');
    ReactDOM.render(<AddFriendButton userId={el.getAttribute('userId')} friendId={el.getAttribute('friendId')} friends={el.getAttribute('friends')} />, el);
}
